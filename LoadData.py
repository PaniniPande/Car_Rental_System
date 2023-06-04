import csv
import mysql.connector

mydb = mysql.connector.connect(host="acadmysqldb001p.uta.edu", user="mxj3280", password="Mjuta2022!", database="mxj3280")
mycursor = mydb.cursor()
print(mydb)
print(mycursor)

with open('/Users/ASUS/Downloads/dbdata/Owner.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      print(a)
      mycursor.execute("INSERT INTO Owner VALUES (%s)", [a])
csvfile.close()


with open('/Users/ASUS/Downloads/dbdata/Rental_Company.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      b = rows[1]
      print(a,b)
      mycursor.execute("INSERT INTO Rental_Company VALUES (%s,%s)", [a,b])
csvfile.close()


with open('/Users/ASUS/Downloads/dbdata/Bank.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      b = rows[1]
      print(a,b)
      mycursor.execute("INSERT INTO Bank VALUES (%s,%s)", [a,b])
csvfile.close()


with open('/Users/ASUS/Downloads/dbdata/Individual.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      b = rows[1]
      c = rows[2]
      print(a,b,c)
      mycursor.execute("INSERT INTO Individual VALUES (%s,%s,%s)", [a,b,c])
csvfile.close()


with open('/Users/ASUS/Downloads/dbdata/CAR.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      b = int(rows[1])
      c = rows[2]
      d = rows[3]
      e = rows[4]
      f = rows[5]
      print(a,b,c,d,e,f)
      mycursor.execute("INSERT INTO CAR VALUES (%s,%s,%s,%s,%s,%s)", [a,b,c,d,e,f])
csvfile.close()


with open('/Users/ASUS/Downloads/dbdata/CAR_TYPE.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      b = int(rows[1])
      c = int(rows[2])
      print(a,b,c)
      mycursor.execute("INSERT INTO CAR_TYPE VALUES (%s,%s,%s)", [a,b,c])
csvfile.close()

with open('/Users/ASUS/Downloads/dbdata/Van.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      print(a)
      mycursor.execute("INSERT INTO Van VALUES (%s)", [a])
csvfile.close()

with open('/Users/ASUS/Downloads/dbdata/Compact.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      print(a)
      mycursor.execute("INSERT INTO Compact VALUES (%s)", [a])
csvfile.close()

with open('/Users/ASUS/Downloads/dbdata/Truck.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      print(a)
      mycursor.execute("INSERT INTO Truck VALUES (%s)", [a])
csvfile.close()

with open('/Users/ASUS/Downloads/dbdata/SUV.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      print(a)
      mycursor.execute("INSERT INTO SUV VALUES (%s)", [a])
csvfile.close()

with open('/Users/ASUS/Downloads/dbdata/Large.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      print(a)
      mycursor.execute("INSERT INTO Large VALUES (%s)", [a])
csvfile.close()

with open('/Users/ASUS/Downloads/dbdata/Medium.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      print(a)
      mycursor.execute("INSERT INTO Medium VALUES (%s)", [a])
csvfile.close()

with open('/Users/ASUS/Downloads/dbdata/Luxury.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      print(a)
      mycursor.execute("INSERT INTO Luxury VALUES (%s)", [a])
csvfile.close()

with open('/Users/ASUS/Downloads/dbdata/Regular.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      print(a)
      mycursor.execute("INSERT INTO Regular VALUES (%s)", [a])
csvfile.close()

with open('/Users/ASUS/Downloads/dbdata/RENTS.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      b = int(rows[1])
      c = rows[2]
      d = rows[3]
      e = int(rows[4])
      f = int(rows[5])
      g = int(rows[6])
      h = int(rows[7])
      i = int(rows[8])
      j = int(rows[9])
      print(a,b,c,d,e,f,g,h,i,j)
      mycursor.execute("INSERT INTO RENTS VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)", [a,b,c,d,e,f,g,h,i,j])
csvfile.close()

with open('/Users/ASUS/Downloads/dbdata/CUSTOMER.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      b = int(rows[1])
      print(a,b)
      mycursor.execute("INSERT INTO CUSTOMER VALUES (%s,%s)", [a,b])
csvfile.close()

with open('/Users/ASUS/Downloads/dbdata/Individual_Cust.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      b = rows[1]
      c = rows[2]
      print(a,b,c)
      mycursor.execute("INSERT INTO Individual_Cust VALUES (%s,%s,%s)", [a,b,c])
csvfile.close()

with open('/Users/ASUS/Downloads/dbdata/Company.csv') as csvfile:
    csv_data = csv.reader(csvfile)
    next(csv_data, None)
    for rows in csv_data:
      a = int(rows[0])
      b = rows[1]
      print(a,b)
      mycursor.execute("INSERT INTO Company VALUES (%s,%s)", [a,b])
csvfile.close()

mydb.commit()