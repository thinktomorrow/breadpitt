var request = require('request'),
    util = require('../util');

module.exports = function(param){
    //var lijstje = sessionStorage.getItem('lijstje');
    var lijst = require('./order');
    //console.log(lijst.arr);
    util.postMessage(param.channel, 'Het lijstje:' + lijst.arr);
        //console.log(param);
};
