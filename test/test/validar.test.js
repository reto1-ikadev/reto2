const validar = require('../validar');

describe("Validar tests", () => {
  test('Validando entrada de correo', () => {
    expect(validar.validarCorreo('qwerty@gmail.com')).toBe(2);
  });
 })