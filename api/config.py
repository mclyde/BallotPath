import os
basedir = os.path.abspath(os.path.dirname(__file__))

CSRF_ENABLED = True
SECRET_KEY = 'randomtestkeythatwillneverbefoundever'

SQLALCHEMY_DATABASE_URI = 'postgresql://BallotPath:Democracy!@localhost:5432/BallotPath'

UPLOAD_FOLDER = '/tmp/import/'

ERROR_FOLDER = '/tmp/import/errors/'
