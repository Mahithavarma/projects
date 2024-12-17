
# app.py
from flask import Flask, jsonify
from flask_cors import CORS
import requests

app = Flask(__name__)
CORS(app)

API_URL = "https://api.open-meteo.com/v1/forecast?latitude=52.52&longitude=13.41&current_weather=true"

@app.route('/api/realtime', methods=['GET'])
def get_realtime_data():
    response = requests.get(API_URL)
    if response.status_code == 200:
        data = response.json()
        weather = {
            "temperature": data['current_weather']['temperature'],
            "windspeed": data['current_weather']['windspeed'],
            "weathercode": data['current_weather']['weathercode']
        }
        return jsonify(weather)
    return jsonify({"error": "Unable to fetch data"}), 500

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)
