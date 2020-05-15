function Alien(x, y, health, fireRate) {
  this.pos = new Point(x, y);
  this.health = health;
  this.fireRate = fireRate;
  this.fireVel = new Vector(4, -90);
  this.width;
  this.fireTimer = 0;
}
Alien.prototype.draw = function () {
  begin();
  con.arc(this.pos.x, this.pos.y, 16, 0, 7, true);
  fill("blue");
  end();
};
Alien.prototype.fire = function () {
  this.fireRate++;
  if (this.fireRate === this.fireTimer) {
    this.fireTimer = 0;
    return [true, new Bullet(this.pos.x, this.pos.y, this.fireVel)];
  }
  return [false, null];
};
Alien.prototype.update = function (y) {
  this.pos.y = y;
};
