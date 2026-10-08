-- event details table
CREATE TABLE event_details (
    event_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    event_name VARCHAR(100),
    event_description VARCHAR(500),
    vehicle_type VARCHAR(50),
    keywords VARCHAR(100),
    location VARCHAR (50),
    event_date DATE
);

-- user details table
CREATE TABLE user_details (
    user_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    forename VARCHAR(50),
    surname VARCHAR(50),
    user_name VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    role VARCHAR(20) DEFAULT 'user'
);

-- email subscribers table
CREATE TABLE subscribers (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50)
);

-- query to add events into event details table
INSERT INTO event_details 
(event_name, event_description, vehicle_type, keywords, location, event_date)
VALUES
(
    'Tokyo Drift Night',
    'A late night gathering for drift enthusiasts featuring custom JDM builds and live demonstrations.',
    'jdm',
    'drift',
    'London',
    '2026-06-14'
),
(
    'Classic Chrome Expo',
    'An exhibition of restored vintage vehicles and retro automotive culture.',
    'classical',
    'vintage',
    'Manchester',
    '2026-07-02'
),
(
    'Muscle Car Thunder',
    'A showcase of powerful American muscle cars with drag strip events and engine competitions.',
    'muscle',
    'racing',
    'Birmingham',
    '2026-08-19'
),
(
    'Offroad Adventure Rally',
    'An outdoor offroad event featuring modified 4x4 vehicles and obstacle challenges.',
    'offroad',
    'custom',
    'Leeds',
    '2026-09-05'
),
(
    'Future Wheels Concept Show',
    'A futuristic showcase of experimental concept vehicles and cutting-edge automotive technology.',
    'concept',
    'retro',
    'Bristol',
    '2026-10-11'
);

-- query to change a user to an admin
UPDATE user_details
SET role = 'admin'
WHERE user_name = 'username';  -- replace username with your selected users username