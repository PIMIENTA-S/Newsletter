from tkinter import *
import mariadb as db

root = Tk()
root.title("database")
root.geometry("300x300")

inicio = LabelFrame(root, text="Inicio", padx=15, pady=15)
inicio.grid(row=0, column=0, padx=30, pady=30)

email = Entry(inicio).grid(row=1)
submit = Button(inicio, text="Submit").grid(row=2)

root.mainloop()