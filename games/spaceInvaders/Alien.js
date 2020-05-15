function Alien(x, y, health, fireRate) {
  this.pos = new Point(x, y);
  this.health = health;
  this.fireRate = fireRate;
  this.fireVel = new Vector(4, -90);
  this.width;
  this.fireTimer = 0;
}
Alien.prototype.draw = function () {};
Alien.prototype.fire = function () {
  this.fireRate++;
  if (this.fireRate === this.fireTimer) {
    this.fireTimer = 0;
    return [true, new Bullet(this.pos.x, this.pos.y, this.fireVel)];
  }
  return [false, null];
};
