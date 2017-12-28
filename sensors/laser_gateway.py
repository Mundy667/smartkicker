import RPi.GPIO as GPIO
import os, time

RECEIVER_A_PIN = 23

def callback_func(channel):
    if GPIO.input(channel):
        print("Lichtschranke unterbrochen")
        # hier kommt dann der http post zum core hin
        # darauf achten dass hier auch das richtige team ausgewertet wird

if __name__ == '__main__':

    GPIO.setmode(GPIO.BCM)
    GPIO.setwarnings(False)
    # bin B spaeter nicht vergessen
    GPIO.setup(RECEIVER_A_PIN, GPIO.IN)
    GPIO.add_event_detect(R
    RECEIVER_A_PIN, GPIO.RISING, callback=callback_func, bouncetime=200)

    try:
        while True:
            time.sleep(0.5)
    except:
        # Event wieder entfernen mittels: 
        GPIO.remove_event_detect(RECEIVER_A_PIN)
