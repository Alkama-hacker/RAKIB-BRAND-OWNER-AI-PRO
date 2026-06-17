<?php
// RAKIB BRAND OWNER - AI PRO V1.0
session_start();

$VALID_PASSWORD = "Rakib_vip-2026";
$error_msg = "";

if (isset($_POST['pro_key'])) {
    if ($_POST['pro_key'] === $VALID_PASSWORD) {
        $_SESSION['is_logged_in'] = true;
    } else {
        $error_msg = "INVALID PRO KEY!";
    }
}

$isLoggedIn = isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>RAKIB BRAND OWNER - AI PRO</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@500;700&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; user-select: none; }
        html, body { width: 100%; height: 100%; overflow: hidden; background: #050510; font-family: 'Rajdhani', sans-serif; }

        .frame-wrap { position: fixed; inset: 0; z-index: 0; display: <?= $isLoggedIn ? 'block' : 'none' ?>; }
        .frame-wrap iframe { width: 100%; height: 100%; border: none; }

        .cyber-panel {
            position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
            width: 220px; z-index: 9999; padding: 2px; border-radius: 16px;
            background: linear-gradient(135deg, #00f0ff, #ff0055, #8a2be2, #00f0ff);
            background-size: 300% 300%; animation: gradient-shift 4s ease infinite;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.8), 0 0 15px rgba(0, 240, 255, 0.3);
        }

        @keyframes gradient-shift { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }

        .panel-inner {
            background: rgba(10, 15, 30, 0.90); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
            border-radius: 14px; padding: 12px; display: flex; flex-direction: column;
            border: 1px solid rgba(255,255,255,0.05);
        }

        .drag-zone {
            cursor: move; display: flex; flex-direction: column; align-items: center;
            padding-bottom: 10px; border-bottom: 1px solid rgba(0, 240, 255, 0.2); margin-bottom: 10px;
        }

        .brand-title {
            font-family: 'Orbitron', sans-serif; font-size: 11px; font-weight: 900;
            color: #fff; text-shadow: 0 0 8px #00f0ff; text-align: center; letter-spacing: 1px;
            background: linear-gradient(90deg, #00f0ff, #ff0055); -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }

        .sub-title { font-size: 9px; color: #00f0ff; letter-spacing: 2px; font-weight: 700; margin-top: 2px; }

        .timer-box {
            display: flex; justify-content: space-between; align-items: center;
            background: rgba(0, 0, 0, 0.6); border: 1px solid rgba(0, 240, 255, 0.15);
            padding: 6px 10px; border-radius: 8px; margin-bottom: 12px; box-shadow: inset 0 2px 10px rgba(0,0,0,0.8);
        }

        .period-info { color: #aaa; font-size: 11px; font-weight: 700; }
        .period-info span { color: #fff; }
        .time-info { color: #00f0ff; font-size: 14px; font-weight: 900; font-family: 'Orbitron', sans-serif; }

        .signal-container { display: flex; justify-content: space-between; gap: 8px; margin-bottom: 5px; }

        .main-signal {
            flex: 1; background: rgba(0, 0, 0, 0.5); border: 2px solid #333; border-radius: 10px;
            display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 10px 4px; transition: all 0.3s;
        }

        .signal-text { font-family: 'Orbitron', sans-serif; font-size: 18px; font-weight: 900; letter-spacing: 1.5px; line-height: 1; text-transform: uppercase; text-align: center;}
        .logic-label { font-size: 7.5px; font-weight: 700; color: #ffd700; text-align: center; margin-top: 6px; letter-spacing: 0.5px; text-shadow: 0 0 5px rgba(255, 215, 0, 0.5); min-height: 18px; display: flex; align-items: center; justify-content: center; line-height: 1.1; }

        .balls-box {
            width: 45px; background: rgba(0, 0, 0, 0.5); border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 6px; padding: 6px 0;
        }

        .ball {
            width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-family: 'Orbitron', sans-serif; font-size: 12px; font-weight: 900; background: #111; border: 2px solid; box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }

        .color-red { color: #ff0055; text-shadow: 0 0 15px #ff0055; border-color: #ff0055; }
        .color-green { color: #00ff66; text-shadow: 0 0 15px #00ff66; border-color: #00ff66; }
        .color-violet { color: #b026ff; text-shadow: 0 0 15px #b026ff; border-color: #b026ff; }
        .color-error { color: #ff3333; text-shadow: 0 0 15px #ff3333; }

        .border-red { border-color: #ff0055; box-shadow: 0 0 12px rgba(255,0,85,0.3); }
        .border-green { border-color: #00ff66; box-shadow: 0 0 12px rgba(0,255,102,0.3); }
        .border-error { border-color: #ff3333; box-shadow: 0 0 12px rgba(255,51,51,0.3); }

        .login-wrap form { display: flex; flex-direction: column; }
        .login-wrap input {
            width: 100%; height: 35px; background: rgba(0,0,0,0.6); border: 1px solid #00f0ff; color: #fff; border-radius: 8px; padding: 0 12px; outline: none; margin-bottom: 12px;
            text-align: center; font-family: 'Orbitron', sans-serif; letter-spacing: 2px; font-size: 11px; box-shadow: inset 0 0 8px rgba(0,240,255,0.1);
        }
        .login-wrap button {
            width: 100%; height: 35px; background: linear-gradient(90deg, #00f0ff, #0055ff); border: none; color: #fff; border-radius: 8px; font-weight: 900; cursor: pointer; font-size: 11px;
            font-family: 'Orbitron', sans-serif; letter-spacing: 1px; box-shadow: 0 4px 10px rgba(0,240,255,0.3); transition: 0.2s;
        }
        .login-wrap button:active { transform: scale(0.95); }
        .error-msg { color: #ff0055; font-size: 10px; font-weight: bold; text-align: center; margin-top: 8px; }
    </style>
</head>
<body>

    <div class="frame-wrap">
        <?php if($isLoggedIn): ?>
            <iframe src="https://hgnice.org/#/register?invitationCode=368681134944"></iframe>
        <?php endif; ?>
    </div>

    <div class="cyber-panel" id="proPanel">
        <div class="panel-inner">
            <div class="drag-zone" id="dragArea">
                <div class="brand-title">RAKIB BRAND OWNER</div>
                <div class="sub-title">AI PRO V1.0</div>
            </div>

            <?php if(!$isLoggedIn): ?>
                <div class="login-wrap">
                    <form method="POST" action="">
                        <input type="password" name="pro_key" placeholder="ENTER PRO KEY" required>
                        <button type="submit">CONNECT AI</button>
                    </form>
                    <?php if(!empty($error_msg)): ?>
                        <div class="error-msg"><?= $error_msg ?></div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div id="hackBox">
                    <div class="timer-box">
                        <div class="period-info">PR: <span id="periodText">Loading...</span></div>
                        <div class="time-info"><span id="timeText">00</span>s</div>
                    </div>

                    <div class="signal-container">
                        <div class="main-signal" id="signalBorder">
                            <div class="signal-text color-violet" id="signalOutput">WAIT</div>
                            <div class="logic-label" id="logicOutput">FETCHING API...</div>
                        </div>
                        <div class="balls-box" id="ballOutput">
                            <div class="ball color-violet">?</div>
                            <div class="ball color-violet">?</div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if($isLoggedIn): ?>
    <script>
        // ==========================================
        // 1. TIMER TWEAK SETTING
        // ==========================================
        const TIMER_ADJUST = -1; // প্যানেলের টাইমারের সাথে ১ সেকেন্ড যোগ করা হয়েছে (Game=6, Panel=5 এর জন্য)

        let globalHistory = [];
        let currentPeriod = "Loading...";
        let lastFetchedCycle = -1;

        function getCountdown() { 
            let seconds = Math.floor(Date.now() / 1000);
            let mod = seconds % 30;
            let rem = 30 - mod;
            
            // Apply Timer Tweak
            rem = rem + TIMER_ADJUST;
            if (rem > 30) rem -= 30;
            
            return rem;
        }

        function getCycleIndex() { 
            return Math.floor((Date.now() - (TIMER_ADJUST * 1000)) / 30000); 
        }

        function addOne(str) {
            let m = str.match(/(\d+)$/);
            if (!m) return str;
            let numStr = m[1];
            let prefix = str.substring(0, str.length - numStr.length);
            let num = BigInt(numStr) + 1n;
            let s = num.toString();
            while (s.length < numStr.length) s = '0' + s;
            return prefix + s;
        }

        async function fetchGameData() {
            try {
                let ts = Date.now();
                let url = `https://draw.ar-lottery01.com/WinGo/WinGo_30S/GetHistoryIssuePage.json?ts=${ts}`;
                
                let response = await fetch(url, {
                    method: 'GET',
                    headers: { 'Accept': 'application/json, text/plain, */*' }
                });
                
                if (!response.ok) throw new Error(`HTTP Error ${response.status}`);
                
                let text = await response.text();
                let data = null;

                if (text.trim().startsWith('{')) {
                    data = JSON.parse(text);
                } else {
                    let cleanBase64 = text.replace(/[^A-Za-z0-9+/=]/g, "");
                    let decodedStr = atob(cleanBase64);
                    data = JSON.parse(decodedStr);
                }
                
                if(data && data.data && data.data.list) {
                    let list = data.data.list;
                    let latest = list[0];
                    currentPeriod = addOne(latest.issueNumber || latest.issue);
                    document.getElementById('periodText').innerText = currentPeriod;
                    
                    globalHistory = list.map(x => Number(x.number)).filter(n => !isNaN(n));
                    analyzePattern();
                } else {
                    throw new Error("Invalid API Format");
                }
            } catch (error) {
                console.error("API Error Details:", error);
                let errStr = error.message;
                if(errStr === "Failed to fetch") errStr = "CORS BLOCKED";
                
                document.getElementById('signalOutput').innerText = "ERROR";
                document.getElementById('signalOutput').className = "signal-text color-error";
                document.getElementById('signalBorder').className = "main-signal border-error";
                document.getElementById('logicOutput').innerText = "ERR: " + errStr.toUpperCase();
            }
        }

        // ==========================================
        // 2. RANDOM TEST MODE (ONLY RED/GREEN)
        // ==========================================
        function analyzePattern() {
            if(globalHistory.length < 1) return;
            
            // Randomly select RED or GREEN
            let isRed = Math.random() > 0.5;
            let signal = isRed ? "RED" : "GREEN";
            let logicName = "RANDOM TEST MODE";

            updateUI(signal, logicName);
        }

        function updateUI(signal, logic) {
            let sigEl = document.getElementById('signalOutput');
            let logEl = document.getElementById('logicOutput');
            let borderEl = document.getElementById('signalBorder');
            let ballBox = document.getElementById('ballOutput');

            sigEl.innerText = signal; 
            logEl.innerText = logic;
            sigEl.className = "signal-text"; 
            borderEl.className = "main-signal";

            let b1, b2, cClass;
            
            // Setup Colors and Balls for Random Mode
            if(signal === 'RED') { 
                cClass = 'color-red'; 
                borderEl.classList.add('border-red'); 
                b1 = [2,4,6,8][Math.floor(Math.random()*4)]; 
                b2 = [2,4,6,8][Math.floor(Math.random()*4)]; 
            } else if(signal === 'GREEN') { 
                cClass = 'color-green'; 
                borderEl.classList.add('border-green'); 
                b1 = [1,3,7,9][Math.floor(Math.random()*4)]; 
                b2 = [1,3,7,9][Math.floor(Math.random()*4)]; 
            }

            sigEl.classList.add(cClass);
            ballBox.innerHTML = `<div class="ball ${cClass}">${b1}</div><div class="ball ${cClass}">${b2}</div>`;
        }

        fetchGameData();
        setInterval(() => {
            let rem = getCountdown();
            let displayRem = rem < 10 ? '0' + rem : rem;
            document.getElementById('timeText').innerText = displayRem;

            let currentCycle = getCycleIndex();
            if (lastFetchedCycle !== -1 && currentCycle !== lastFetchedCycle) {
                document.getElementById('signalOutput').innerText = "WAIT";
                document.getElementById('logicOutput').innerText = "FETCHING API...";
                document.getElementById('signalOutput').className = "signal-text color-violet";
                document.getElementById('signalBorder').className = "main-signal";
                setTimeout(() => fetchGameData(), 1500); 
            }
            lastFetchedCycle = currentCycle;
        }, 1000);
    </script>
    <?php endif; ?>

    <script>
        // Drag System
        let dragItem = document.getElementById("proPanel");
        let dragZone = document.getElementById("dragArea");
        let active = false, currentX, currentY, initialX, initialY, xOffset = 0, yOffset = 0;

        function dragStart(e) {
            initialX = e.type === "touchstart" ? e.touches[0].clientX - xOffset : e.clientX - xOffset;
            initialY = e.type === "touchstart" ? e.touches[0].clientY - yOffset : e.clientY - yOffset;
            if (e.target === dragZone || dragZone.contains(e.target)) active = true;
        }

        function dragEnd() { active = false; }

        function drag(e) {
            if (active) {
                e.preventDefault();
                currentX = e.type === "touchmove" ? e.touches[0].clientX - initialX : e.clientX - initialX;
                currentY = e.type === "touchmove" ? e.touches[0].clientY - initialY : e.clientY - initialY;
                xOffset = currentX; yOffset = currentY;
                dragItem.style.transform = `translate(calc(-50% + ${currentX}px), calc(-50% + ${currentY}px))`;
            }
        }

        dragZone.addEventListener("touchstart", dragStart, {passive: false});
        window.addEventListener("touchend", dragEnd);
        window.addEventListener("touchmove", drag, {passive: false});
        dragZone.addEventListener("mousedown", dragStart);
        window.addEventListener("mouseup", dragEnd);
        window.addEventListener("mousemove", drag);
    </script>
</body>
</html>
