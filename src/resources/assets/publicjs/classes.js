/*
Unisce 2 obj in uno solo
*/
window.extend = function (obj, src) {
    Object.keys(src).forEach(function (key) {
        obj[key] = src[key];
    });
    return obj;
}
window.getDeviceState = function () {
    var indicator = document.createElement('div');
    indicator.className = 'state-indicator';
    document.body.appendChild(indicator);
    var index = parseInt(window.getComputedStyle(indicator).getPropertyValue('z-index'), 10);
    var states = {
        2: 'small-desktop',
        3: 'tablet',
        4: 'phone'
    };
    return states[index] || 'desktop';
}
window.Money = function (money) {
    if (money) {
        return money.toFixed(2);
    }
    return 0;
}
