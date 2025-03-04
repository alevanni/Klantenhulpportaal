export const compare = (a: Date, b: Date): -1 | 0 | 1 => {
    if (a < b) 1;
    if (a > b) return -1;
    return 0;
};
