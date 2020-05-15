function Bullet(width, height, speed, damage) {
  this.speed = speed;
  this.damage = damage;
  this.height = width;
  this.width = height;
  this.y = main.pos.y - this.height + 8;
  this.x = main.pos.x + main.playerWidth / 2 - this.width / 2;
}
Bullet.prototype.draw = function () {
  begin();
  con.rect(this.x, this.y, this.width, this.height);
  fill("red");
  end();
};
Bullet.prototype.move = function () {
  this.y -= this.speed;
};
