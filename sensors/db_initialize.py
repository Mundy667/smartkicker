#support for python 2 only
import MySQLdb as mdb
import sys

#host ip 172.18.. ist die aktuelle docker ip. intern auf localhost. 
host = '172.18.0.2'
user = 'root'
password = 'kicker'
port = 3306
db = 'kicker'

con = mdb.connect(
    host=host,
    user=user,
    passwd=password,
    port=port,
    db=db
    )



with con:
    
    cur = con.cursor()
    cur.execute("DROP TABLE IF EXISTS games")
    cur.execute("CREATE TABLE games(Id INT PRIMARY KEY AUTO_INCREMENT, gameId INT, team VARCHAR(4))")
    print("Table created")
    cur.execute("INSERT INTO games(gameId, team) VALUES('0', 'new')")
    print("first entry created: Id 1, gameId 0, team new")


