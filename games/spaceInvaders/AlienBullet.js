function AlienBullet(x, y, velocity, damage) {
  this.pos = new Point(x, y);
  this.vel = velocity;
  this.dmg = damage;
}
AlienBullet.prototype.draw = function () {
  begin();
  circle(true, this.pos.x, this.pos.y, 5, "red");
  end();
};
AlienBullet.prototype.update = function () {
  this.pos.addVect(this.vel);
};
