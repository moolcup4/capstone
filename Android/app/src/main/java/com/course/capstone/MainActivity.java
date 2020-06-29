package com.course.capstone;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;

import android.Manifest;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;
import android.util.Base64;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.io.ByteArrayOutputStream;
import java.io.FileNotFoundException;
import java.io.InputStream;
import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {
    Button btnChoose;
    Button btnUpload;
    ImageView imageUpload;
    final int CODE_GALLERY_REQUEST = 999;
    Bitmap bitmap;
    //태원
    String urlUpload = "http://10.70.23.175/and/upload.php";
    //일현
//    String urlUpload = "http://10.70.7.184/upload.php";

    ProgressDialog progressDialog;

    private EditText NAME;
//    private TextView MENU;
    private Spinner sinceSpinner;
    private Spinner sinceSpinner2;
    private Spinner sinceSpinner3;
    private Spinner sinceSpinner4;

    private ArrayAdapter arrayAdapter;
    private ArrayAdapter arrayAdapter2;
    private ArrayAdapter arrayAdapter3;
    private ArrayAdapter arrayAdapter4;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        btnChoose = (Button) findViewById(R.id.btnChoose);
        btnUpload = (Button) findViewById(R.id.btnUpload);
        imageUpload = (ImageView) findViewById(R.id.imageUpload);

        NAME = (EditText)findViewById(R.id.name);
//        MENU = (TextView) findViewById(R.id.menu);


        btnChoose.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                ActivityCompat.requestPermissions(
                        MainActivity.this,
                        new String[]{Manifest.permission.READ_EXTERNAL_STORAGE},
                        CODE_GALLERY_REQUEST
                );
            }
        });

        btnUpload.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
//post image to server
                progressDialog = new ProgressDialog(MainActivity.this);
                progressDialog.setTitle("Uploading");
                progressDialog.setMessage("Please wait...");
                progressDialog.show();

                StringRequest stringRequest = new StringRequest(Request.Method.POST, urlUpload, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();

                        NAME.setText(null);
//                        MENU.setText("");
//                        sinceSpinner.setAdapter("A");
//                        sinceSpinner2.setText(null);
//                        sinceSpinner3.setText(null);

                        Toast.makeText(getApplicationContext(), response, Toast.LENGTH_LONG).show();
                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        progressDialog.dismiss();
                        Toast.makeText(getApplicationContext(), "error: " + error.toString(), Toast.LENGTH_LONG).show();
                    }
                }){
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map<String, String> params = new HashMap<>();
                        String imageData = imageToString(bitmap);
                        params.put("image", imageData);

                        params.put("name",NAME.getText().toString().trim());
//                        params.put("menu",MENU.getText().toString().trim());
                        params.put("sinceSpinner",(sinceSpinner.getSelectedItem().toString()));
                        params.put("sinceSpinner2",sinceSpinner2.getSelectedItem().toString());
                        params.put("sinceSpinner3",sinceSpinner3.getSelectedItem().toString());
                        params.put("sinceSpinner4",sinceSpinner4.getSelectedItem().toString());

                        return params;
                    }
                };
                RequestQueue requestQueue = Volley.newRequestQueue(MainActivity.this);
                requestQueue.add(stringRequest);
            }
        });


        setViews();
    }

    public void setViews() {
        sinceSpinner = (Spinner) findViewById(R.id.since_spinner);
        sinceSpinner2 = (Spinner) findViewById(R.id.since_spinner2);
        sinceSpinner3 = (Spinner) findViewById(R.id.since_spinner3);
        sinceSpinner4 = (Spinner) findViewById(R.id.since_spinner4);

        // ★

        arrayAdapter = ArrayAdapter.createFromResource(this, R.array.spinnerArray, android.R.layout.simple_spinner_dropdown_item);
        arrayAdapter2 = ArrayAdapter.createFromResource(this, R.array.spinnerArray2, android.R.layout.simple_spinner_dropdown_item);
        arrayAdapter3 = ArrayAdapter.createFromResource(this, R.array.spinnerArray3, android.R.layout.simple_spinner_dropdown_item);
        arrayAdapter4 = ArrayAdapter.createFromResource(this, R.array.spinnerArray4, android.R.layout.simple_spinner_dropdown_item);

        sinceSpinner.setAdapter(arrayAdapter);
        sinceSpinner2.setAdapter(arrayAdapter2);
        sinceSpinner3.setAdapter(arrayAdapter3);
        sinceSpinner4.setAdapter(arrayAdapter4);
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        if(requestCode == CODE_GALLERY_REQUEST){
            if(grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED){
                Intent intent = new Intent(Intent.ACTION_PICK);
                intent.setType("image/*");
                startActivityForResult(Intent.createChooser(intent,"select image"), CODE_GALLERY_REQUEST);
            } else {
                Toast.makeText(getApplicationContext(), "You don't have permission to access to gallery", Toast.LENGTH_LONG).show();
            }
            return;
        }
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
    }


    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        if(requestCode == CODE_GALLERY_REQUEST && resultCode == RESULT_OK && data != null){
            Uri filePath = data.getData();

            try {
                InputStream inputStream = getContentResolver().openInputStream(filePath);
                bitmap = BitmapFactory.decodeStream(inputStream);
                imageUpload.setImageBitmap(bitmap);

            } catch (FileNotFoundException e) {
                e.printStackTrace();
            }

        }
        super.onActivityResult(requestCode, resultCode, data);
    }

    private String imageToString(Bitmap bitmap){
        ByteArrayOutputStream outputStream = new ByteArrayOutputStream();
        bitmap.compress(Bitmap.CompressFormat.JPEG, 100, outputStream);
        byte[] imageBytes = outputStream.toByteArray();

        String encodedImage = Base64.encodeToString(imageBytes, Base64.DEFAULT);
        return encodedImage;
    }
}