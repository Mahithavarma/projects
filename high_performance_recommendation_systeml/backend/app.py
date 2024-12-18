
import pandas as pd
from sklearn.metrics.pairwise import cosine_similarity
from flask import Flask, jsonify

app = Flask(__name__)

# Sample user-item ratings data
data = {'User': ['A', 'A', 'B', 'B', 'C', 'C'],
        'Item': ['Item1', 'Item2', 'Item2', 'Item3', 'Item3', 'Item4'],
        'Rating': [5, 3, 4, 5, 3, 2]}
df = pd.DataFrame(data)

# Create pivot table
pivot_table = df.pivot_table(index='User', columns='Item', values='Rating').fillna(0)

# Compute cosine similarity
similarity_matrix = cosine_similarity(pivot_table.T)
similarity_df = pd.DataFrame(similarity_matrix, index=pivot_table.columns, columns=pivot_table.columns)

@app.route('/recommend/<item>', methods=['GET'])
def recommend(item):
    if item not in similarity_df.columns:
        return jsonify({"error": "Item not found"}), 404
    recommendations = similarity_df[item].sort_values(ascending=False)[1:4].index.tolist()
    return jsonify({"recommendations": recommendations})

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)
