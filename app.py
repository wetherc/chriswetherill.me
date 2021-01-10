import yaml
import os
from pathlib import Path
from flask import Flask, request, render_template


APP_ROOT = Path(os.path.realpath(os.path.expanduser(__file__))).parents[0]
app = Flask(__name__)


@app.route('/', methods=['GET'])
def index():
    return render_template('index.html')


@app.route('/resume', methods=['GET'])
def resume():
    with open(APP_ROOT / 'content/cv.yml', 'r') as data:
        parsed_cv = yaml.safe_load(data)
    return render_template('resume.html', data=parsed_cv)


if __name__ == '__main__':
    app.run(host='127.0.0.1')
