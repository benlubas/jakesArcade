function Player(x, y, speed, health, cooldown) {
  this.pos = new Point(x, y);
  this.speed = speed;
  this.health = health;
  this.playerWidth = 32;
  this.img = new Image();
  this.img.src = "images/ship.png";
  this.bullets = Array();
  this.cooldown = cooldown;
  this.cooldownCounter = cooldown;
}

Player.prototype.move = function (w, h) {
  if (k.a) {
    this.pos.x -= this.speed;
    if (this.pos.x < 0) this.pos.x = 0;
  }
  if (k.d) {
    this.pos.x += this.speed;
    if (this.pos.x + this.playerWidth > w) this.pos.x = w - this.playerWidth;
  }
};
Player.prototype.draw = function () {
  begin();
  con.drawImage(
    this.img,
    this.pos.x,
    this.pos.y,
    this.playerWidth,
    this.playerWidth
  );
  fill("blue");
  end();
};
Player.prototype.shoot = function () {
  if (this.cooldownCounter % this.cooldown == 0) {
    this.bullets.push(new Bullet(10, 4, 1, 1));
    this.cooldownCounter = 0;
    score++;
  }
};
Player.prototype.updateBullets = function () {
  for (x = 0; x < this.bullets.length; x++) {
    this.bullets[x].move();
    if (this.bullets[x].y < 0) {
      this.bullets.splice(x, 1);
    }
  }
  if (this.cooldownCounter < this.cooldown) {
    this.cooldownCounter++;
  }
};
Player.prototype.drawBullets = function () {
  for (x = 0; x < this.bullets.length; x++) {
    this.bullets[x].draw();
  }
};
