from tkinter import messagebox
import tkinter as tk
import os
from openpyxl import Workbook
from openpyxl import load_workbook
from CTkMessagebox import CTkMessagebox
from openpyxl.workbook import Workbook
import conexion


from customtkinter import *
from CTkListbox import *
from customtkinter import  CTkButton, CTkEntry, CTkImage, CTkLabel
import customtkinter as ctk
from PIL import ImageTk, Image
from datetime import datetime



class Historial (object):
    

    def __init__(self) -> None:
        self.ventana2=ctk.CTk()
        self.datos = conexion.Registro_de_datos()
        self.ventana2.geometry("1240x720")
        
        altura = self.ventana2.winfo_reqheight()
        anchura = self.ventana2.winfo_reqwidth()
        altura_pantalla = self.ventana2.winfo_screenheight()
        anchura_pantalla = self.ventana2.winfo_screenwidth()
    
        x = (anchura_pantalla // 5) - (anchura//4)
        y = (altura_pantalla//5) - (altura//4)
        self.ventana2.geometry(f"+{x}+{y}")
        self.ventana2.title("Food OK!")
        self.ventana2.config(bg="orange") 
        self.ventana2.iconbitmap("C:\\FO_OK\\ico.ico")
        # self.frame = ctk.CTkFrame(self.ventana2, width= 440,height=600, bg_color='black',fg_color='black').place(x=50,y=50)
        self.opciones()
        self.mostrar_historial()
        self.ventana2.mainloop()
        pass
        

    def opciones(self):
        self.lbl = CTkEntry(self.ventana2, width=100,height= 28)
        self.lbl.place(x=600,y=50)

    def mostrar_historial(self):
        self.l = CTkListbox (self.ventana2, width= 440,height=600,fg_color='black',border_width=5, corner_radius=20, bg_color='orange')
        self.l.place(x=50,y=50)
        id= 1
        # datos = self.datos.obtener_todos_los_productos_de_historial_por_id([id])
        datos = self.datos.obtener_todos_los_productos()
        etiquetas = []
        for i, dato in enumerate(datos):
            etiqueta = ctk.CTkButton(self.l, text=" ".join(map(str, dato)), fg_color="black", bg_color="black")
            etiqueta.pack(side="top", pady=5)
            etiquetas.append(etiqueta)


        pass



a =Historial()