
import boto3
import requests
import json

# Initialize DynamoDB client
dynamodb = boto3.resource('dynamodb')
table = dynamodb.Table('StockPrices')

def lambda_handler(event, context):
    # Fetch stock prices from Yahoo Finance API
    url = "https://query1.finance.yahoo.com/v7/finance/quote"
    params = {"symbols": "AAPL,MSFT,GOOG"}
    response = requests.get(url, params=params)
    data = response.json()

    # Process and store data in DynamoDB
    for stock in data["quoteResponse"]["result"]:
        table.put_item(Item={
            "symbol": stock["symbol"],
            "price": stock["regularMarketPrice"],
            "timestamp": stock["regularMarketTime"]
        })

    return {
        "statusCode": 200,
        "body": json.dumps({"message": "Stock prices updated successfully"})
    }
