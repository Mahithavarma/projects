import openai
import os

openai.api_key = os.getenv("OPENAI_API_KEY")

def summarize_log(log_text):
    response = openai.ChatCompletion.create(
        model="gpt-4",
        messages=[
            {"role": "system", "content": "You are an expert DevOps assistant."},
            {"role": "user", "content": f"Analyze this CI/CD failure log and summarize the root cause: {log_text}"}
        ]
    )
    return response.choices[0].message.content
