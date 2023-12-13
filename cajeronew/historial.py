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
    # def Filtro(self, a):
    #     a
    #     datosfiltro = self.x.get()
    #     print(datosfiltro)


    #     pass
    def Filtro(self):
        datosfiltro = self.x.get()
        print(datosfiltro)

        if datosfiltro==0 or datosfiltro==None or datosfiltro=="":
            CTkMessagebox(title='Error', message=f' {datosfiltro} ')
        else:
            if datosfiltro =='Dia, Mes y Agno':

                self.entry1 = CTkEntry(self.ventana2, width=120,height=30,border_width=0,corner_radius=20,bg_color='orange', placeholder_text='Dia')
                self.entry1.place(x=750,y=50)
                self.entry2 = CTkEntry(self.ventana2, width=120,height=30,border_width=0,corner_radius=20,bg_color='orange', placeholder_text='Mes')
                self.entry2.place(x=750,y=100)
                self.entry3 = CTkEntry(self.ventana2, width=120,height=30,border_width=0,corner_radius=20,bg_color='orange', placeholder_text='Agno')
                self.entry3.place(x=750,y=150)
                
                self.btnBuscar = CTkButton(self.ventana2, width=120,height=30,border_width=0,corner_radius=20,bg_color='orange', text='Buscar', command=lambda:self.Buscar())
                self.btnBuscar.place(x=600,y=50)
            if datosfiltro =='Dia':
                
                self.entry1 = CTkEntry(self.ventana2, width=120,height=30,border_width=0,corner_radius=20,bg_color='orange', placeholder_text='Dia')
                self.entry1.place(x=750,y=50)
                self.btnBuscar = CTkButton(self.ventana2, width=120,height=30,border_width=0,corner_radius=20,bg_color='orange', text='Buscar', command=lambda:self.Buscar())
                self.btnBuscar.place(x=600,y=50)
                self.entry2.place_forget()
                self.entry3.place_forget()
            if datosfiltro =='Mes':
                
                self.entry1 = CTkEntry(self.ventana2, width=120,height=30,border_width=0,corner_radius=20,bg_color='orange', placeholder_text='Mes')
                self.entry1.place(x=750,y=50)
                self.btnBuscar = CTkButton(self.ventana2, width=120,height=30,border_width=0,corner_radius=20,bg_color='orange', text='Buscar', command=lambda:self.Buscar())
                self.btnBuscar.place(x=600,y=50)
                self.entry2.place_forget()
                self.entry3.place_forget()
            if datosfiltro =='Mes':
                
                self.entry1 = CTkEntry(self.ventana2, width=120,height=30,border_width=0,corner_radius=20,bg_color='orange', placeholder_text='Agno')
                self.entry1.place(x=750,y=50)
                self.btnBuscar = CTkButton(self.ventana2, width=120,height=30,border_width=0,corner_radius=20,bg_color='orange', text='Buscar', command=lambda:self.Buscar())
                self.btnBuscar.place(x=600,y=50)
                self.entry2.place_forget()
                self.entry3.place_forget()
        pass
    def Buscar(self):
        datosfiltro = self.x.get()
        print(datosfiltro)
        if datosfiltro =='Dia, Mes, Agno':
            dato= [self.entry3.get() + '-' + self.entry2.get() + '-' + self.entry1.get()]
            fecha = self.datos.HISTORIAL_flitrar_por_fecha_completa(dato)
            self.mostrar_historial2(fecha)
        if datosfiltro =='Dia':
            dato= [self.entry1.get()]
            fecha = self.datos.HISTORIAL_flitrar_por_dia(dato)
            self.mostrar_historial2(fecha)
        if datosfiltro =='Mes':
            dato= [self.entry1.get()]
            fecha = self.datos.HISTORIAL_flitrar_por_mes(dato)
            self.mostrar_historial2(fecha)
        if datosfiltro =='Agno':
            dato= [self.entry1.get()]
            fecha = self.datos.HISTORIAL_flitrar_por_mes(dato)
            self.mostrar_historial2(fecha)
        print(dato)
        
        print(fecha)

        pass

    def mostrar_historial2(self,fecha):
        self.list = CTkListbox (self.ventana2, width=440,height=600,fg_color='black',border_width=5, corner_radius=20, bg_color='orange')
        self.list.place(x=50,y=50)
        id= 1
        
        datos = fecha
        etiquetas = []
        for i, dato in enumerate(datos):
            etiqueta = ctk.CTkButton(self.list, text=" ".join(map(str, dato)), fg_color="black", bg_color="black",hover_color="orange")
            etiqueta.pack(side="top", pady=5)
            etiquetas.append(etiqueta)

    def opciones(self):
        

        self.btnCerrar = CTkButton(self.ventana2, width=120,height=30,border_width=0,corner_radius=20,bg_color='orange', text='Cerrar', command=lambda:self.ventana2.destroy())
        self.btnCerrar.place(x=1100,y=10)
        # a=1
        # self.x = CTkComboBox(self.ventana2, width=200,height=30,border_width=0,corner_radius=20,bg_color='orange',values=['Dia, Mes, Agno', 'Nombre', 'Precio'], command=lambda a=a: self.Filtro(a))
        self.x = CTkComboBox(self.ventana2, width=200,height=30,border_width=0,corner_radius=20,bg_color='orange',values=['Dia, Mes y Agno','Dia','Mes','Agno', 'Nombre', 'Precio'])
        self.x.place(x=880,y=50)
        self.filtrar = CTkButton(self.ventana2, width=120,height=30,border_width=0,corner_radius=20,bg_color='orange', text='Filtrar', command=lambda:self.Filtro())
        self.filtrar.place(x=1100,y=50)
    

    def mostrar_historial(self):
        self.list = CTkListbox (self.ventana2, width= 440,height=600,fg_color='black',border_width=5, corner_radius=20, bg_color='orange')
        self.list.place(x=50,y=50)
        id= 1
        # datos = self.datos.obtener_todos_los_productos_de_historial_por_id([id])
        datos = self.datos.obtener_todos_los_productos()
        etiquetas = []
        for i, dato in enumerate(datos):
            etiqueta = ctk.CTkButton(self.list, text=" ".join(map(str, dato)), fg_color="black", bg_color="black",hover_color="orange")
            etiqueta.pack(side="top", pady=5)
            etiquetas.append(etiqueta)


        pass


Historial()