#support for python 2 only
import MySQLdb as mdb
import sys

#host ip 172.18.. ist die aktuelle docker ip. unklar wie funktional wenn script auf anderem host läuft
host = '172.18.0.2'
user = 'root'
password = 'kicker'
port = 3306
db = 'kicker'

try:
    conn = mdb.connect(
        host=host,
        user=user,
        passwd=password,
        port=port,
        db=db
    )

    cur = conn.cursor()
    cur.execute("SELECT VERSION()")

    ver = cur.fetchone()
    
    print "Database version : %s " % ver
    
except mdb.Error, e:
  
    print "Error %d: %s" % (e.args[0],e.args[1])
    sys.exit(1)
    
finally:    
        
    if conn:    
        conn.close()

