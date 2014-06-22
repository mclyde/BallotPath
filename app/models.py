from app import db
from sqlalchemy.dialects import postgresql

class Office(db.Model):
    id = db.Column(db.INTEGER, primary_key = True)
    district_id = db.Column(db.INTEGER) 
    title = db.Column(db.VARCHAR(35))
    num_positions = db.Column(db.INTEGER)
    responsibilities = db.Column(db.TEXT)
    term_length_months = db.Column(db.INTEGER)
    filing_fee = db.Column(db.TEXT)
    partisan = db.Column(db.BOOLEAN)
    age_requirements = db.Column(db.INTEGER)
    res_requirements = db.Column(db.TEXT)
    prof_requirements = db.Column(db.TEXT)
    salary = db.Column(db.TEXT)
    notes = db.Column(db.TEXT)

class District(db.Model):
    id = db.Column(db.INTEGER, primary_key = True)
    name = db.Column(db.VARCHAR(50))
    level_id = db.Column(db.CHAR)
    election_div_id = db.Column(db.INTEGER)
