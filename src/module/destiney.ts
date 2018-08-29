interface ShopWithRatio {
    id: number,
    name: string,
    description: string,
    latitude: number,
    longitude: number,
    holiday: number,
    ratio: number
}

function decide(shopList: Array<ShopWithRatio>): any {
    for (let i: number = 0; i < shopList.length; i++) {
        shopList[i].ratio = 1 / shopList.length;
    }

    let rand = Math.random();

    let probability = 0;
    for (let i: number = 0; i < shopList.length; i++) {
        probability += shopList[i].ratio;

        if (rand <= probability) {
             return shopList[i];
        }
    }
}

export function promiseDestiney(shopList: Array<ShopWithRatio>): Promise<ShopWithRatio> {
    return new Promise((resolve: any): any => {
        resolve(decide(shopList));
    });
}
