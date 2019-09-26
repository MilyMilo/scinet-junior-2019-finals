import os
import urllib
import json
import base64
from flask import Flask, render_template, request, redirect, make_response, flash
from werkzeug import secure_filename

app = Flask(__name__, static_folder="static", static_url_path="/")

BASE_DIR = os.path.dirname(os.path.realpath(__file__))

SETTINGS = {
    'username': 'daphne',
    'password': 'ZekGx2RBrYGFZHvD',
    # 'password': 'test',
    'secret_key': '76hj3cy9oBNCy8RfaCCrYz63Z3SNG6bk',
    'upload_path': os.path.join(BASE_DIR, 'attachments/'),
    'submissions_file': os.path.join(BASE_DIR, 'submissions.json')
}

app.config['SECRET_KEY'] = SETTINGS['secret_key']


@app.add_template_filter
def basename(text):
    return text.split('/')[-1]


@app.add_template_filter
def b64encode(text):
    return str(base64.b64encode(text.encode("utf-8")), "utf-8")


@app.route('/', methods=['GET'])
def index():
    return render_template('index.html')


@app.route('/contact', methods=['GET'])
def contact():
    return render_template('contact.html')


@app.route('/contact', methods=['POST'])
def do_contact():
    name = request.form.get('name', '').strip()
    inquiry = request.form.get('inquiry', '').strip()
    f = request.files['attachment']
    submissions = safe_get_submissions()

    if f.filename == '':
        submissions.append(
            {'name': name, 'inquiry': inquiry, 'attachment': ''}
        )

        with open(SETTINGS['submissions_file'], 'w+') as sf:
            json.dump(submissions, sf)

        flash('Thank you for your inquiry!')
        return redirect('/')

    attachment_path = os.path.join(SETTINGS['upload_path'], f.filename)
    f.save(attachment_path)

    submissions.append({
        'name': name, 'inquiry': inquiry,
        'attachment': attachment_path
    })
    with open(SETTINGS['submissions_file'], 'w+') as sf:
        json.dump(submissions, sf)

    flash('Thank you for your inquiry!')
    return redirect('/')


@app.route('/admin', methods=['GET'])
def admin():
    auth = request.cookies.get('auth', None)
    if auth is None:
        return fuck_off()

    auth = urllib.parse.unquote(auth)
    auth = json.loads(auth)

    if auth.get('role', '') != 'admin':
        # insufficient permissions
        return render_template('block.html')

    # user with role admin
    submissions = safe_get_submissions()
    attachments = [
        f for f in os.listdir(SETTINGS['upload_path'])
        if os.path.isfile(os.path.join(SETTINGS['upload_path'], f))
    ]

    return render_template('admin.html', submissions=submissions, attachments=attachments, submissions_path=SETTINGS['upload_path'])


@app.route('/admin/run', methods=['POST'])
def run_python():
    choice = request.form.get('choice', None)

    if choice is None:
        flash('Invalid choice')
        return redirect('/admin')

    script = str(base64.b64decode(choice), 'utf-8')
    script = script.replace(' ', '\ ')

    out = os.popen('python3 {}'.format(
        os.path.join(SETTINGS['upload_path'], script)
    )).read()
    return render_template('test.html', output=out)


@app.route('/login', methods=['GET'])
def login():
    return render_template('login.html')


@app.route('/login', methods=['POST'])
def do_login():
    username = request.form.get('username', '')
    password = request.form.get('password', '')

    if username == SETTINGS['username'] and password == SETTINGS['password']:
        data = {'username': username, 'password': password, 'role': 'user'}
        data = json.dumps(data)
        data = urllib.parse.quote(data)
        res = make_response(redirect('/admin'))
        res.set_cookie('auth', data)
        return res

    flash("Incorrect credentials")
    return render_template('login.html')


@app.errorhandler(404)
@app.errorhandler(500)
def error(error):
    return render_template('error.html')


def fuck_off():
    flash('Please log in first')
    return redirect('/login')


# returns contents of submissions_file or empty array if file doesn't exist
def safe_get_submissions():
    if os.path.exists(SETTINGS['submissions_file']):
        with open(SETTINGS['submissions_file'], 'r+') as sf:
            return json.load(sf)

    return []
