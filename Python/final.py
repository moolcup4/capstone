from imutils import face_utils
import numpy as np
from scipy.spatial import distance as dist
import argparse
import imutils
import dlib
import cv2
import time
from gaze_tracking import GazeTracking
#from pymouse import PyMouse
import pyautogui
import pymysql.cursors
import winsound as ws
import face_recognition
import os.path
import copy

Counter = 0

Counter2 = 0


pyautogui.FAILSAFE = False


gaze = GazeTracking()
#m = PyMouse()

ANCHOR_POINT = (0, 0)
ANCHOR_POINT2 = (0, 0)
before_point = (0, 0)




(nStart, nEnd) = face_utils.FACIAL_LANDMARKS_IDXS["right_eye"]
(lStart, lEnd) = face_utils.FACIAL_LANDMARKS_IDXS["left_eye"]
EYE_AR_THRESH = 0.28
EYE_AR_CONSEC_FRAMES = 5

COUNTER = 0
TOTAL = 0
ANCHOR = 0
ANCHOR2 = 0

detector = dlib.get_frontal_face_detector()
predictor = dlib.shape_predictor("shape_predictor_68_face_landmarks.dat")

cap = cv2.VideoCapture(0)








#minjae_image = face_recognition.load_image_file("known/minjae.jpg")
#minjae_face_encoding = face_recognition.face_encodings(minjae_image)[0]

# Load a second sample picture and learn how to recognize it.
#taewon_image = face_recognition.load_image_file("known/taewon.jpg")
#taewon_face_encoding = face_recognition.face_encodings(taewon_image)[0]

#hyojin_image = face_recognition.load_image_file("known/hyojin.jpg")
#hyojin_face_encoding = face_recognition.face_encodings(hyojin_image)[0]



#known_face_encodings = [
#    minjae_face_encoding,
#    taewon_face_encoding,
#    hyojin_face_encoding,

#]


#known_face_names = [
#    "minjae",
#    "taewon",
#    "hyojin",
#    "ilhyun"]















path = "./known"
file_list = os.listdir(path)


name_lst= []
known_face_names = []
known_face_encodings = []


for i in file_list:
    name_lst.append(i.replace(".jpg",""))

for i in name_lst:
    known_face_names.append(i)

temp_lst = copy.deepcopy(name_lst)

for idx,i in enumerate(name_lst):
    name_lst[idx] = name_lst[idx] + '_face_encoding'
    known_face_encodings.append(name_lst[idx])



for i in range(len(temp_lst)):
    temp = "known/" + temp_lst[i] + '.jpg'
    temp_image = face_recognition.load_image_file(temp)
    temp_face_encoding = face_recognition.face_encodings(temp_image)[0]
    known_face_encodings[i] = temp_face_encoding


























# Initialize some variables
face_locations = []
face_encodings = []
face_names = []
process_this_frame = True





















def success():
    freq = 1000    # range : 37 ~ 32767
    dur = 1000     # ms
    ws.Beep(freq, dur) # winsound.Beep(frequency, duration)

def fail():
    freq = 4000    # range : 37 ~ 32767
    dur = 1000     # ms
    ws.Beep(freq, dur) # winsound.Beep(frequency, duration)

# print(success())
# print(fail())

















##

#def Load_LabelIDs(fn): #메모장
#   labelNames = [ "hyojin","illhyun","minjae","taewon"]
#
#    with open(fn) as f:
#        data = f.readlines()
#        for i in range(len(data)):
#            lines = str(data[i]).split("\\n")
#            for s in lines:
#              labelNames.append(s)
#    return labelNames
#
#labelNames = Load_LabelIDs('labelIDs.txt')
#labelDics = {}
#for s in labelNames:
#    strs = str(s).split("=")
#    labelDics[strs[0]] = strs[0].split("\n")[0]
#    print(str(s)) #3
#face_cascade = cv2.CascadeClassifier('haarcascades/data/haarcascade_frontalface_default.xml')
#recognizer = cv2.face.LBPHFaceRecognizer_create()
#recognizer.read("face-trainner.yml")  # 저장된 값 가져오기






def eye_distance(eye):
    A = dist.euclidean(eye[1], eye[5])
    B = dist.euclidean(eye[2], eye[4])
    C = dist.euclidean(eye[0], eye[3])
    eye_dist = (A + B) / (2.0 * C)

    return eye_dist


#

def direction2(right_pupil, anchor_point):
    nx, ny = right_pupil
    x, y = anchor_point
    #print("r_eye_point",r_eye_point)
    #print("anchor_point",anchor_point)
    if nx > x + 4:
        return 'left'
    elif nx < x -4 :
        return 'right'

    return '-'

#















def direction(r_eye_point, anchor_point,h, multiple = 1):
    nx, ny = r_eye_point
    x, y = anchor_point
    #print("r_eye_point",r_eye_point)
    #print("anchor_point",anchor_point)
    if ny > y + multiple * h:
        return 'down'
    elif ny < y - multiple * h:
        return 'up'

    return '-'








def extract_eye(image, left, bottom_left, bottom_right, right, upper_right, upper_left):
    lower_bound = max([left[1], right[1], bottom_left[1], bottom_right[1], upper_left[1], upper_right[1]])
    upper_bound = min([left[1], right[1], upper_left[1], upper_right[1], bottom_left[1], bottom_right[1]])

    eye = image[upper_bound-3:lower_bound+3, left[0]-3:right[0]+3]
    image[upper_bound-3:lower_bound+3, left[0]-3:right[0]+3] = eye

    return eye





def get_mouse_x():
    mouse_position = list(pyautogui.position())
    mouse_x = mouse_position[0]
    return mouse_x

def get_mouse_y():
    mouse_position = list(pyautogui.position())
    mouse_y = mouse_position[1]
    return mouse_y

def mouse_hor(shape, ANCHOR, image,nStart,nEnd):

    global dir
    global dir2
    global ANCHOR_POINT
    global r_eye_point
    global ANCHOR2
    global ANCHOR_POINT2
    global before_point




    r_eye = shape[nStart:nEnd]
    r_eye_point = (r_eye[3, 0], r_eye[3, 1])
    while ANCHOR < 10:
        ANCHOR += 1
        ANCHOR_POINT = r_eye_point




    right_pupil = gaze.pupil_right_coords()
    if(right_pupil == None):
        right_pupil = before_point


    while ANCHOR2 < 10:
        ANCHOR2 += 1
        ANCHOR_POINT2 = right_pupil



    ANCHOR_HEIGHT = 4
    cv2.line(image, ANCHOR_POINT, r_eye_point, (0,0,255), 2)







    dir = direction(r_eye_point, ANCHOR_POINT, ANCHOR_HEIGHT)

    if dir == 'up':
        pyautogui.moveTo(get_mouse_x(),390)

        #pyautogui.moveTo(700, get_mouse_y())
    elif dir == 'down':
        pyautogui.moveTo(get_mouse_x(),1615)
        #pyautogui.moveTo(500, get_mouse_y())
    else:
        pyautogui.moveTo(get_mouse_x(),1015)
        #pyautogui.moveTo(600, get_mouse_y())


    ##
    ax, by = right_pupil
    cx, dy = ANCHOR_POINT2
    print("prior: ", cx)
    print("new: ", ax)
##



    dir2 = direction2(right_pupil,ANCHOR_POINT2)
    if dir2 == 'left':
        pyautogui.moveTo(300,get_mouse_y())
        #pyautogui.moveTo(get_mouse_x(), 400)

    elif dir2 == 'right':
        pyautogui.moveTo(1000,get_mouse_y())
        #pyautogui.moveTo(get_mouse_x(), 600)

    else:
        pyautogui.moveTo(630, get_mouse_y())
        #pyautogui.moveTo(get_mouse_x(), 500)





    before_point = right_pupil




    return ANCHOR





def mouse_click(shape,COUNTER,TOTAL,EYE_AR_THRESH,EYE_AR_CONSEC_FRAMES,right_eye,nStart,nEnd,lStart, lEnd):
    leftEye = shape[lStart:lEnd]
    rightEye = shape[nStart:nEnd]
    leftEAR = eye_distance(leftEye)
    rightEAR = eye_distance(rightEye)

    ear = (leftEAR + rightEAR) / 2.0

    print('ear: ', ear)

    if ear < EYE_AR_THRESH:
        COUNTER += 1

    else:
        if COUNTER >= EYE_AR_CONSEC_FRAMES:
            TOTAL += 1
            pyautogui.click(get_mouse_x(),get_mouse_y(),1)

            cv2.putText(right_eye, "Click!", (10, 30),
                        cv2.FONT_HERSHEY_SIMPLEX, 0.7, (0, 0, 255), 2)

        COUNTER = 0

    return COUNTER





def find_pupil(right_eye):
    global gray_right_eye
    global threshold
    gray_right_eye = cv2.cvtColor(right_eye, cv2.COLOR_BGR2GRAY)
    gray_right_eye = cv2.GaussianBlur(gray_right_eye, (11, 11), 0)
    _, threshold = cv2.threshold(gray_right_eye, 65, 255, cv2.THRESH_BINARY_INV)
    _, contours, _ = cv2.findContours(threshold, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)
    contours = sorted(contours, key=lambda x: cv2.contourArea(x), reverse=True)
    return contours







def mouse_ver(contours , right_eye):
    for cnt in contours:
        (x, y, w, h) = cv2.boundingRect(cnt)
        cv2.rectangle(right_eye, (x, y), (x + w, y + h), (255, 0, 0), 2)
        cv2.line(right_eye, (x + int(w/2), 0), (x + int(w/2), rows), (0, 255, 0), 2)
        cv2.line(right_eye, (0, y + int(h/2)), (cols, y + int(h/2)), (0, 255, 0), 2)

        arr.append((int(x)+int(w/2)))
        if len(arr) == 20:
            a= np.array(arr)
            xx = list(pyautogui.position())
            xxx = xx[0]
            yyy = xx[1]
            #print(xx)
            avg = np.sort(a)

            if(avg[5] > 37 ):
                pyautogui.move(550,yyy)
            elif(avg[5] <= 35):
                pyautogui.move(650,yyy)
            else :
                pyautogui.move(600,yyy)
            arr.clear()

        break





def image_show(right_eye, image):
    cv2.imshow("Threshold", threshold)
    # cv2.imshow("gray right_eye", gray_right_eye)
    cv2.imshow("right_eye", right_eye)
    cv2.imshow("image",image)

    #cv2.waitKey(0)








arr = []
while(True):
    ret, image  = cap.read()


    gaze.refresh(image)
    image = gaze.annotated_frame()


    #print('right_pupil:',right_pupil)

    # Resize frame of video to 1/4 size for faster face recognition processing
    small_frame = cv2.resize(image, (0, 0), fx=0.25, fy=0.25)

    # Convert the image from BGR color (which OpenCV uses) to RGB color (which face_recognition uses)
    rgb_small_frame = small_frame[:, :, ::-1]

    if(Counter<=25):
        # Only process every other frame of video to save time
        if process_this_frame:
            # Find all the faces and face encodings in the current frame of video
            face_locations = face_recognition.face_locations(rgb_small_frame)
            face_encodings = face_recognition.face_encodings(rgb_small_frame, face_locations)

            face_names = []
            for face_encoding in face_encodings:
                # See if the face is a match for the known face(s)
                matches = face_recognition.compare_faces(known_face_encodings, face_encoding)

                face_distances = face_recognition.face_distance(known_face_encodings, face_encoding)
                min_value = min(face_distances)
                name = "unknown"
                best_match_index = np.argmin(face_distances)
                if min_value < 0.4 and matches[best_match_index]:
                    name = known_face_names[best_match_index]

                face_names.append(name)








                #if Counter <= 15:
                connection = pymysql.connect(user="root", password="dgu1234!", host="localhost", port=3309,
                                             charset="utf8mb4")


                try:
                    with connection.cursor() as cursor:
                        sql = 'USE kiosk'
                        cursor.execute(sql)
                        if(Counter2==0):

                            sql = 'Drop TABLE customer'
                            cursor.execute(sql)
                            sql = 'CREATE TABLE customer (name varchar(10))'
                            cursor.execute(sql)
                        # cursor.execute(sql)
                        sql = 'INSERT INTO customer values(%s)'
                        # cursor.execute(sql, ('boyoung'))
                        # cursor.execute(sql, ('minho'))
                        cursor.execute(sql, (name))
                        #if(name == 'unknown'):
                        #   unknown ++
                        #else:
                        #    ddd++













                        if (Counter2 == 0):
                                print(success())

                        connection.commit()
                        result2 = cursor.fetchall()
                        print(result2)
                finally:
                    connection.close()
                    Counter2 = 1
                    print(name, face_names, face_distances)

                #else:
                    #print(fail())
                #if(unknowncounter <knowncounter)
                #   sound(known)
                #else
                #   sound(unknown)

    else:
        if(Counter2==1):
            print(fail())

        Counter2=0;









    process_this_frame = not process_this_frame




    if(Counter<=25):
        # Display the results
        for (top, right, bottom, left), name in zip(face_locations, face_names):
            # Scale back up face locations since the frame we detected in was scaled to 1/4 size
            top *= 4
            right *= 4
            bottom *= 4
            left *= 4

            # Draw a box around the face
            cv2.rectangle(image, (left, top), (right, bottom), (0, 0, 255), 2)

            # Draw a label with a name below the face
            cv2.rectangle(image, (left, bottom - 35), (right, bottom), (0, 0, 255), cv2.FILLED)
            font = cv2.FONT_HERSHEY_DUPLEX
        cv2.putText(image, name, (left + 6, bottom - 6), font, 1.0, (255, 255, 255), 1)

        # Display the resulting image
        #cv2.imshow('Video', image)


        # print('right_pupil:',right_pupil)
    image = image[150:480, 200:500]
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    rects = detector(gray, 1)
    #cv2.imshow('Preview', image)  # 이미지 보여주기






























#    image = image[150:480, 200:500]
#    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
#    rects = detector(gray, 1)

#    faces = face_cascade.detectMultiScale(gray, scaleFactor=1.5, minNeighbors=5)


#    for (x, y, w, h) in faces:
#        roi_gray = gray[y:y + h, x:x + w]  # 얼굴 부분만 가져오기

#        id_, conf = recognizer.predict(roi_gray)  # 얼마나 유사한지 확인
#        print(id_, conf)  #2 52.171728 ..
#        print(labelNames[id_])   #['boyoung', 'minho','minjae', txt]





#        if Counter <= 10:




#            connection = pymysql.connect(user="root", password="dgu1234!", host="localhost", port=3309,
#                                         charset="utf8mb4")

#            try:
#                with connection.cursor() as cursor:
#                    # sql = 'CREATE DATABASE cafe;'
#                    sql = 'USE kiosk'
#                    cursor.execute(sql)
                    # sql = 'CREATE TABLE user (name varchar(10)) CHARSET utf8'
                    # cursor.execute(sql)
                    #   sql = 'CREATE TABLE customer (name varchar(10))CHARSET utf8'
                    #  cursor.execute(sql)
                    # cursor.execute(sql)
#                    sql = 'INSERT INTO customer values(%s)'
                    # cursor.execute(sql, ('boyoung'))
                    # cursor.execute(sql, ('minho'))
#                    cursor.execute(sql, (labelNames[id_]))

#                    if (Counter2 == 0):
#                        print(success())

#                    connection.commit()
#                    result2 = cursor.fetchall()
#                    print(result2)
#                    print(labelDics)
#            finally:
#                connection.close()
#                Counter2 = 1;

#       else:
#            print(fail())

























#        if (labelNames[id_] in labelDics):
#            font = cv2.FONT_HERSHEY_SIMPLEX  # 폰트 지정
#            name = labelNames[id_]  # ID를 이용하여 이름 가져오기
#            cv2.putText(image, name, (x, y), font, 1, (0, 0, 255), 2)
#            cv2.rectangle(image, (x, y), (x + w, y + h), (0, 255, 0), 2)
#        else :
#            cv2.putText(image, "unknown", (x, y), font, 1, (0, 0, 255), 2)
#            cv2.rectangle(image, (x, y), (x + w, y + h), (0, 255, 0), 2)


#   cv2.imshow('Preview', image)  # 이미지 보여주기
































    ANCHOR_check = 0

    for (i, rect) in enumerate(rects):
        shape = predictor(gray, rect)
        shape = face_utils.shape_to_np(shape)
        right_eye = imutils.resize(extract_eye(image, shape[36], shape[41], shape[46], shape[45], shape[44], shape[37]), width=200, height=100)

        ANCHOR = mouse_hor(shape, ANCHOR, image,nStart,nEnd)
        COUNTER = mouse_click(shape, COUNTER, TOTAL, EYE_AR_THRESH, EYE_AR_CONSEC_FRAMES, right_eye, nStart, nEnd,lStart, lEnd)




        print(COUNTER)






        rows, cols, _ = right_eye.shape
        right_eye = right_eye[0:1000,0:60]
        contours = find_pupil(right_eye)
        #mouse_ver(contours, right_eye)




        ANCHOR_check = 1
        image_show(right_eye, image)



    Counter = Counter+1;








    if ANCHOR_check == 0:
        ANCHOR =0

    key = cv2.waitKey(1)

    if key == 27:
        break









cap.release()
cv2.destroyAllWindows()