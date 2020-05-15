function Row(width, y, health) {
  this.width = width;
  this.health = health;
  this.y = y;
  this.aliens = new Array(parseInt(this.width / 65))
    .fill(0)
    .map(
      (v, i) =>
        new Alien(i * 48 + (this.width * 12) / 65, this.y, this.health, 5)
    );
}

Row.prototype.draw = function () {
  this.aliens.forEach((v) => v.draw());
};
Row.prototype.move = function (yIncrease) {
  this.y += yIncrease;
  this.aliens.forEach((a) => a.update(this.y));
};
