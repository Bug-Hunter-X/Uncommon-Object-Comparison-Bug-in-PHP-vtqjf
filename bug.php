function foo(a, b) {
  if (a === b) {
    return true;
  } else if (typeof a !== 'object' || typeof b !== 'object') {
    return false; 
  }
  const keysA = Object.keys(a);
  const keysB = Object.keys(b);
  if (keysA.length !== keysB.length) {
    return false;
  }
  for (let i = 0; i < keysA.length; i++) {
    const key = keysA[i];
    if (!b.hasOwnProperty(key) || !foo(a[key], b[key])) {
      return false;
    }
  }
  return true;
}

const obj1 = { a: 1, b: 2, c: { d: 3 } };
const obj2 = { a: 1, b: 2, c: { d: 3 } };
console.log(foo(obj1, obj2)); // true

const obj3 = { a: 1, b: 2 };
const obj4 = { b: 2, a: 1 };
console.log(foo(obj3, obj4)); // false - This is incorrect, it should return true