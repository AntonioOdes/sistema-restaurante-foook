import mysql.connector

class Registro_de_datos():
    def __init__(self):
        self.conexion = mysql.connector.connect(host='cs.ilab.cl',
                                                database='2_BD_69',
                                                user='2_BD_69',
                                                password='nicolas.matamalal23')
        
    def buscar_user(self, nombres):
        cur = self.conexion.cursor()
        sql = "SELECT * FROM cajero WHERE rut = {}".format(nombres)
        cur.execute(sql)
        nomx = cur.fetchall()
        cur.close()
        return nomx
    
    def busca_password(self, contrasena):
        cur = self.conexion.cursor()
        sql = "SELECT * FROM cajero WHERE password = {}".format(contrasena)
        cur.execute(sql)
        conx = cur.fetchall()
        cur.close()
        return conx

    def ingresar_producto(self, id, preciounitario,comentario, fecha_venta, hora_venta):
        cur = self.conexion.cursor()
        sql = "INSERT INTO hitorial (id, preciounitario,comentario, fecha_venta, hora_venta) VALUES ( %s, %s, %s, %s, %s)"
        data = (id, preciounitario,comentario, fecha_venta, hora_venta)
        cur.execute(sql, data)
        self.conexion.commit()
        cur.close()
    
    def obtener_todos_los_productos(self):
        cur = self.conexion.cursor()
        cur.execute("SELECT * FROM hitorial")
        productos = cur.fetchall()  # Obtener todas las filas de la tabla
        cur.close()
        return productos
    
    def eliminar_producto_por_contador(self, contador):
        cur = self.conexion.cursor()
        sql = "DELETE FROM hitorial WHERE id = %s"
        data = (contador)
        cur.execute(sql, data)
        self.conexion.commit()
        cur.close()


