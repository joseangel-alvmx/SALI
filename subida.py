import os
import requests
import shutil

# Definir las rutas de las carpetas
storage_folder = "storage"
backup_folder = "backup"

# Asegúrate de que la carpeta de respaldo existe
if not os.path.exists(backup_folder):
    os.makedirs(backup_folder)

# URL del endpoint al que se va a hacer la solicitud POST
url = "http://192.168.1.9:8000/api/sendFile"

# Contraseña
password = 'r%HV6WXAeRS!PbwugAi4'

# Recorrer todos los archivos en la carpeta de almacenamiento
for filename in os.listdir(storage_folder):
    if filename.endswith(".exp") or filename.endswith(".txt"):
        file_path = os.path.join(storage_folder, filename)

        # Parámetros de la solicitud POST
        files = {
            'file': open(file_path, 'rb')  # Abre el archivo en modo de lectura binaria
        }
        data = {
            'password': password  # Valor de la variable password
        }

        # Realizar la solicitud POST
        response = requests.post(url, files=files, data=data)

        # Imprimir la respuesta del servidor
        print(f"Procesando archivo: {filename}")
        print("Código de estado:", response.status_code)
        print("Respuesta del servidor:", response.text)

        # Cerrar el archivo
        files['file'].close()

        # Mover el archivo a la carpeta de respaldo
        backup_path = os.path.join(backup_folder, filename)
        shutil.move(file_path, backup_path)
        print(f"Archivo movido a: {backup_path}\n")