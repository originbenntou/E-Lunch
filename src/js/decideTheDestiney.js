module.exports = class DecideTheDestiney
{
    _getShopJson() {
        return new Promise(function (resolve) {
            $.getJSON('../data/lunch.json', function (shops) {
                // 等確率追加
                shops.forEach(function (obj) {
                    obj.ratio = 1 / shops.length;
                });

                resolve(shops);
            });
        });
    }

    doGacha() {
        return new Promise(resolve => {
            let rand = Math.random();

            this._getShopJson().then(function (shops) {
                let probability = 0;
                for (var i = 0; i < shops.length; i++) {
                    probability += shops[i].ratio;

                    if (rand <= probability) {
                        resolve([shops, shops[i].name]);
                    }
                }
            });
        });
    }
}
