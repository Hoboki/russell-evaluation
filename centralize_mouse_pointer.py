"""
Centeralize mouse pointer
※This API should be implemented on LOCAL Mac (Not in container).

- Setup
mamba create -n russell-evaluation python=3.9 fastapi uvicorn pyautogui

- Start API
mamba activate russell-evaluation
cd ~/Documents/russell-evaluation

uvicorn centralize_mouse_pointer:app --port 8002
OR
uvicorn centralize_mouse_pointer:app --port 8002 --reload # For debug

- Request
curl http://127.0.0.1:8002 # bash
"""

from fastapi import FastAPI
import pyautogui as pg

app = FastAPI()
X, Y = pg.size()

@app.get("/")
async def root():
    pg.moveTo(X//2, Y//2)
    return {"message":"Centralized"}
