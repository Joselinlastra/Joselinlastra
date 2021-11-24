import random
for x in range(1,4):
	dado=random.randint(1,6)
	print("Primer jugador:",dado)
	dado2=random.randint(1,6)
	print("Segundo jugador:",dado2)
	dado3=random.randint(1,6)
	print("Tercer jugador:",dado3)
	
if dado>dado2:
	print("El primer jugador es el ganador")
elif dado2>dado3:
	print("El segundo jugador es el ganador")
elif dado3>dado1:
	print("El tercer jugador es el ganador")