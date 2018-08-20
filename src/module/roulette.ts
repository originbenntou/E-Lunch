interface Shop {
    name: string,
    description: string,
    latitude: number,
    longitude: number,
    holiday: number,
    ratio: number
}

export function promiseRoulette(list: Array<Shop>, result: Shop, vm: any): Promise<{}> {
    return new Promise((resolve: any): any => {
        let count: number = 0,
            delay: number = 100;
        let interval: any, interval2: any, interval3: any, interval4: any;

        let roop: any = function() {

            vm.$data.result = list[Math.floor(Math.random() * list.length)].name;
            count++;

            if (count === 20) {
                clearTimeout(interval);
                interval2 = setInterval(roop, 200);
            }

            if (count === 27) {
                clearTimeout(interval2);
                interval3 = setInterval(roop, 800);
            }

            if (count === 29) {
                clearTimeout(interval3);
                interval4 = setInterval(roop, 1200);
            }

            if (count === 31) {
                clearTimeout(interval4);
                vm.$data.result = result.name;
                vm.$data.description = result.description;
                resolve();
            }
        };

        // ルーレットスタート
        interval = setInterval(roop, delay);
    });
}
