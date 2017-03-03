var request = require('request'),
    util = require('../util'),
    lijstje = [];

module.exports = function(param){
    var value = param.args.join(" ");

    //var lijstje = [];
    lijstje.push(" "+value);

    module.exports.arr = lijstje;
    //module.exports.push2arr = function(val){module.exports.arr.push(param.args.join(" "));};
    console.log(lijstje);
    util.postMessage(param.channel, 'Toegevoegd aan lijstje: ' + value);
    return lijstje;
    //console.log(param);
};
