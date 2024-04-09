if (!PROD) {
    endMovie()
}

const RUSSELL_RADIUS = 250

var mov_idx = Number(params.mov_idx)
var x = Number(params.x)
var y = Number(params.y)
var str_choice
var end_choice
var chose = false
var next_php_name

if (x !== -10000 && y !== -10000) {
    console.log(x, y)
    writePoint(RUSSELL_RADIUS + x, RUSSELL_RADIUS - y)
}

const choiceTime = document.getElementById("rest-time")

var interval = setInterval(() => {
    var current_time = Date.now()
    if (current_time - str_choice >= 5000 && chose) {
        clearInterval(interval)
        window.location.href = next_php_name
    }
}, 100);

function endMovie(e) {
    str_choice = Date.now()
    var movie = document.getElementById("movie")
    var btnNextBackGroup = document.getElementById("btn-next-back-group")
    movie.classList.add("ended")
    russell.classList.add("active")
    btnNextBackGroup.classList.add("active")
}

function clickRussellRec(e) {
    end_choice = Date.now()
    var offsetX = e.offsetX
    var offsetY = e.offsetY
    var x = offsetX + 2
    var y = offsetY + 2
    console.log(x, y)
    writePoint(x, y)

    //Store Russell data
    var paramsStore = new FormData()
    paramsStore.append("mov_idx", mov_idx)
    paramsStore.append("x", x - RUSSELL_RADIUS)
    paramsStore.append("y", RUSSELL_RADIUS - y)
    paramsStore.append("t", end_choice - str_choice)
    console.log(...paramsStore.entries())

    var options = { // Don't assign Content-Type
        method: "POST",
        body: paramsStore,
    }
    fetch("api/store.php", options).then((res) => res.json()).then((res) => {
        if (res.code == 400) {
            window.location.href = "index.php?status=400"
        }
    }).catch(console.error)
    chose = true
}

function getRussellRec() {
    return document.getElementById("russell-rec")
}

function writePoint(x, y) {
    const russellRec = getRussellRec()
    var rx = 2*x/russellRec.offsetWidth - 1
    var ry = 1 - 2*y/russellRec.offsetHeight
    var russellPoint = document.getElementById("russell-point")
    if (russellPoint) {
        russellPoint.remove()
    }
    var russellPoint = document.createElement("div")
    russellPoint.id = "russell-point"
    russellPoint.style.left = `calc(${rx*50 + 50}% - 2px)`
    russellPoint.style.top = `calc(${50 - ry * 50}% - 2px)`
    russellRec.appendChild(russellPoint)
}
