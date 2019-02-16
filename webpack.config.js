const configs = [
    require('./build/scripts_js.config'),
    require('./build/style_css.config'),
    require('./build/block_js.config'),
    require('./build/block_editor_css.config'),
    require('./build/block_style_css.config')
];

function isEmptyObject(obj) {
    for(let key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}

const config = [];

const SYNC = process.env.SYNC;

configs.forEach(function (item) {
    if(typeof item.entry !== 'undefined' && isEmptyObject(item.entry) === false ) {
        config.push(item);
    }
});

module.exports = config;