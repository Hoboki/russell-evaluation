const REST_TIME_SECOND = PROD? 60 : 1
var start = new Date()
var next_php_name

const restTime = document.getElementById("rest-time")

var interval = setInterval(() => {
    var now = new Date()
    var diff = now - start
    restTime.innerText = `${REST_TIME_SECOND - Math.floor(diff/1000)}`
    console.log(next_php_name)
    if (REST_TIME_SECOND * 1000 <= diff) {
        stopInterval()
        window.location.href = next_php_name
    }
}, 100)

function stopInterval() {
    clearInterval(interval)
}
