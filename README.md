# 🚀 Liftoff

**From code to cosmos in seconds.**

Liftoff is your launchpad for **Craft CMS** projects.
Skip the countdown and head straight to orbit with a starter kit that’s ready to roll.

---

## ✨ Features

- Local development [powered by DDEV](https://ddev.com/)
- [Vite](https://vitejs.dev/) and [Tailwind CSS](https://tailwindcss.com/) based front-end build tooling.

---

## 🔧 Getting Started

1. **Clone the repo:**

If you already have PHP and Composer running on your host machine, you can run the following command
```shell
composer create-project high-five/liftoff {PROJECT NAME} --ignore-platform-reqs
```

If you'd rather not set up PHP, you can create the project with a desposable Docker image ([Thanks nystudio107](https://nystudio107.com/blog/dock-life-using-docker-for-all-the-things)).

```shell
docker run --rm -it -v "$PWD":/app -v ${COMPOSER_HOME:-$HOME/.composer}:/tmp composer create-project high-five/liftoff {PROJECT NAME} --ignore-platform-reqs
```

2. Start DDEV & install dependencies
```shell
cd {PROJECT NAME}
ddev composer install
ddev npm ci
```

3. Install Craft CMS
```shell
ddev craft install
```
4. Run `ddev launch` to open the project in your browser