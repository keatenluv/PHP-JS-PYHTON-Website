UPDATE Podcasts SET Title='The War of Art' WHERE ID=102;
UPDATE Podcasts SET Title='Physics of Consciousness and the Infinite Universe' WHERE ID=85;
UPDATE Podcasts SET Guest='Joscha Bach',Title='Artificial Consciousness and the Nature of Reality',Releasedate='2020-06-13',DurationMins=181 WHERE ID=101;
UPDATE Podcasts SET Guest='',Title='',Releasedate='2020-06-13',DurationMins=0 WHERE ID=100;
DELETE FROM Podcasts WHERE DurationMins=0;