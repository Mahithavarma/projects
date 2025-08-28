import json
from datetime import datetime

def main(req):
    # Minimal Azure Function style signature placeholder
    payload = {
        "message": "Ticket received",
        "ticket_id": f"TKT-{int(datetime.utcnow().timestamp())}",
        "status": "New"
    }
    return json.dumps(payload)
