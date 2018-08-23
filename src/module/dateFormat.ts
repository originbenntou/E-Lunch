export function getFormattedDate(): string {
    const date: Date = new Date,
        weekList: string[] = ["日", "月", "火", "水", "木", "金", "土"],
        weekId: number = date.getDay();

    let formattedHour: string    = ('0' + date.getHours()).slice(-2),
        formattedMinutes: string = ('0' + date.getMinutes()).slice(-2),
        formattedSeconds: string = ('0' + date.getSeconds()).slice(-2),
        formatted: string = [formattedHour, formattedMinutes, formattedSeconds].join(':');

    return (date.getMonth()+1) + "/" + date.getDate() + "(" + weekList[weekId] + ") " + formatted;
}


