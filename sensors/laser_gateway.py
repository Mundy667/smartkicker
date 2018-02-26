import RPi.GPIO as GPIO
import os, time
import MySQLdb as mdb


RECEIVER_A_PIN = 23
RECEIVER_B_PIN = 24

def callback_func(channel):
    if GPIO.input(channel):
        #print("Lichtschranke unterbrochen: ", channel)
        # darauf achten dass hier auch das richtige team ausgewertet wird
        host = '192.168.111.12'
        user = 'root'
        password = 'kicker'
        port = 8989
        db = 'kicker'

        con = mdb.connect(
        host=host,
        user=user,
        passwd=password,
        port=port,
        db=db
        )

        cur = con.cursor()
        #Retriev current gameId
        cur.execute("SELECT * FROM games ORDER BY id DESC LIMIT 0,1")

        row = cur.fetchone()

        currentGameId = int(row[1])

        if channel == RECEIVER_A_PIN:
            teamGoal = 'A'
        else: 
            teamGoal = 'B'
        print("GOAAAL - Team ", teamGoal)
        sql = "INSERT INTO games(gameId, team) VALUES(%d, '%s')" % (currentGameId, teamGoal)
        cur.execute(sql)
        con.commit()


if __name__ == '__main__':

    GPIO.setmode(GPIO.BCM)
    GPIO.setwarnings(False)
    # bin B spaeter nicht vergessen
    GPIO.setup(RECEIVER_A_PIN, GPIO.IN)
    GPIO.setup(RECEIVER_B_PIN, GPIO.IN)
    GPIO.add_event_detect(RECEIVER_A_PIN, GPIO.RISING, callback=callback_func, bouncetime=200)
    GPIO.add_event_detect(RECEIVER_B_PIN, GPIO.RISING, callback=callback_func, bouncetime=200)


    try:
        while True:
            time.sleep(0.5)
    except:
        # Event wieder entfernen mittels: 
        GPIO.remove_event_detect(RECEIVER_A_PIN)
        GPIO.remove_event_detect(RECEIVER_B_PIN)

       
