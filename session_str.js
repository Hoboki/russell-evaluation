const REST_TIME_SECOND = PROD? 5 : 1
var start = new Date()

const restTime = document.getElementById("rest-time")

var interval = setInterval(() => {
    var now = new Date()
    var diff = now - start
    if (REST_TIME_SECOND * 1000 <= diff) {
        stopInterval()
        window.location.href = "evaluation.php"
    }
}, 10)

function stopInterval() {
    clearInterval(interval)
}
