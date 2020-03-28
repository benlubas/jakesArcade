function Player(x, y, speed, health) {
  this.pos = new Point(x, y);
  this.speed = speed;
  this.health = health;
}

Player.prototype.draw = function () {};
