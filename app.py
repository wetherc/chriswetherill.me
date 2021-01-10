import yaml
import secrets
import os
from pathlib import Path
from flask import Flask, request, render_template
from typing import List


APP_ROOT = Path(os.path.realpath(os.path.expanduser(__file__))).parents[0]
app = Flask(__name__)

with open(APP_ROOT / 'content/alternative_facts.yml', 'r') as facts:
    FACTS = yaml.safe_load(facts)


def pull_alternative_fact(fact_list: List[str]) -> str:
    return f'Chris {secrets.choice(fact_list)}'


@app.route('/', methods=['GET'])
def index():
    _fact = pull_alternative_fact(FACTS)
    return render_template('index.html', fact=_fact)


@app.route('/resume', methods=['GET'])
def resume():
    with open(APP_ROOT / 'content/cv.yml', 'r') as data:
        parsed_cv = yaml.safe_load(data)

    _fact = pull_alternative_fact(FACTS)
    return render_template('resume.html', fact=_fact, data=parsed_cv)


if __name__ == '__main__':
    app.run(host='127.0.0.1')
