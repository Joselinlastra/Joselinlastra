for x in range(1,11):
	nombre=input("Ingrese el medicamento N°"+str(x)+" : ")
	cantidad=int(input("Ingrese cantidad : "))
	print("El medicamento es: ",nombre,"Cantidad: ",cantidad)
	min= cantidad < 5
	print(min,cantidad)
	