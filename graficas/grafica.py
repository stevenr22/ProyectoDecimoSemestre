import sqlite3
import json

# Conectarse a la base de datos
conn = sqlite3.connect('../bd/conexion.php')
cursor = conn.cursor()

# Consulta para obtener los datos relevantes
cursor.execute("SELECT nombre, cantidad_total_usada FROM total_insumos")
rows = cursor.fetchall()

# Procesar los datos
labels = []
data = []

for row in rows:
    labels.append(row[0])  # Nombre del insumo
    data.append(row[1])    # Cantidad total usada

# Calcular porcentajes
total = sum(data)
porcentajes = [(cantidad / total) * 100 for cantidad in data]

# Crear una estructura de datos para Chart.js
chart_data = {
    'labels': labels,
    'data': porcentajes
}

# Convertir a JSON (si es necesario)
chart_data_json = json.dumps(chart_data)

# Aquí puedes pasar chart_data_json a tu frontend o usarlo directamente con JavaScript para Chart.js
