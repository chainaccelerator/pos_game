MATCH (n)
OPTIONAL MATCH (n)-[r]-()
DELETE n, r;

CREATE(s1:Spaceship {label: 'Stake One', address: 'address2', color: '#ffffff', x1: rand() % 45, y1: rand() % 45,
                     x2:    rand() % 45, y2: rand() % 45, x3: rand() % 45, y3: rand() % 45, opacity: rand()})
CREATE(m1:Spaceship {label: 'WAN MAJOR', address: 'address1', color: '#ffffff', x1: rand() % 45, y1: rand() % 45,
                     x2:    rand() % 45, y2: rand() % 45, x3: rand() % 45, y3: rand() % 45, opacity: rand()})
CREATE (b1:BlockGenenator {label: 'Block1', address: 'address4'})
CREATE(pr1:Productor {label: 'Product Man', address: 'address60', color: '#ffffff', x1: rand() % 45, y1: rand() % 45,
                      x2:    rand() % 45, y2: rand() % 45, opacity: rand()});

CREATE (a1:Account {label: 'user1', address: 'address3', address_public: 'fs65d4f6s5d4f6s5d4f'})
CREATE (n1:Node {label: '127.0.0.1', address: 'address50', port: 8751, ip: '127.0.0.1'})
CREATE (p1:Planet {label: 'Vegetable', address: 'address30', seed_part: 'vegetable', size: 10000, discovered: false})
CREATE (k1:Key {label: 'Majic 20.000', address: 'address32', amount: 20000})
CREATE(s2:Spaceship {label: 'HashMan', address: 'address21', color: '#ffffff', x1: rand() % 45, y1: rand() % 45,
                     x2:    rand() % 45, y2: rand() % 45, x3: rand() % 45, y3: rand() % 45, opacity: rand()})
CREATE (d1:Deposit {label: 'DepositUser2', address: 'address24'})
CREATE (a2:Account {label: 'user2', address: 'address23', address_public: 'fs65d4f6s5d4f6s5d4f'})
CREATE (n2:Node {label: '127.0.0.2', address: 'address22', port: 8751, ip: '127.0.0.1'})
CREATE (a3:Account {label: 'user3', address: 'address45', address_public: 'fs65d4f6s5d4f6s5d4f'})




MATCH (s1:Spaceship {address: 'address2'})
MATCH (m1:Spaceship {address: 'address1'})
CREATE(s1)-[att1:ATTACK {result:   true, downtime: 1000, date: timestamp(), state: 'validated', reward: 0,
                         rewarded: false} ]->(m1)
        <-[cla1:ATTACK_CLAIM {date: timestamp(), state: 'validated', reward: 0, rewarded: false} ]
        -(s1)
RETURN m1, s1, att1, cla1;

MATCH (s1:Spaceship {address: 'address2'})
MATCH (m1:Spaceship {address: 'address1'})
CREATE (m1)
         -[att2:ATTACK {result:   false, malicious: 1000, date: timestamp(), state: 'validated', reward: 0,
                        rewarded: false} ]
         ->(s1)
         <-[cla2:ATTACK_CLAIM {date: timestamp(), state: 'validated', reward: 0, rewarded: false} ]
         -(m1)
RETURN m1, s1, att2, cla2;


MERGE (e1:Epoc {label: 'Epoc1', address: 'address5'})
  ON CREATE SET e1.counter = 0
  ON MATCH SET e1.counter = coalesce(e1.counter, 0) + 1
RETURN e1;

MATCH (e1:Epoc {address: 'address5'})
MATCH (b1:BlockGenenator {address: 'address4'})
MATCH (a1:Account {address: 'address3'})
MATCH (s1:Spaceship {address: 'address2'})
MATCH (n1:Node {address: 'address50'})
CREATE (e1)
         <-[gen1:GENERATE {date: timestamp(), state: 'validated', reward: 0, rewarded: false}]
         -(b1)
         <-[sel1:SELECTED {date: timestamp(), state: 'validated', reward: 0, rewarded: false} ]
         -(a1)
         -[reg1:REGISTER {date: timestamp(), state: 'validated', reward: 0, rewarded: false}]
         ->(s1)
         -[run1:RUN {date: timestamp(), state: 'validated', reward: 0, rewarded: false}]
         ->(n1)
RETURN e1, b1, a1, n1, s1, gen1, sel1, reg1, run1;

MATCH (s1:Spaceship {address: 'address2'})
MATCH (p1:Planet {address: 'address30'})
MATCH (k1:Key {address: 'address32'})
CREATE (s1)
         -[con1:CONQUIERED {amount: 20}]
         ->(p1)
         <-[key1:KEY_DISPATCH]
         -(k1)
RETURN s1, p1, con1, key1, k1;

MATCH (s1:Spaceship {address: 'address2'})-->(k1:Key {address: 'address32'})
RETURN
  CASE size((s1)-->(k1))
    WHEN 19 THEN k1.discovered = true
    ELSE ''
    END AS result;

MATCH (s2:Spaceship {address: 'address21'})
MATCH (m1:Spaceship {address: 'address1'})
CREATE (s2)
         -[att3:ATTACK {result:   true, downtime: 1000, date: timestamp(), state: 'validated', reward: 0,
                        rewarded: false} ]
         ->(m1)
         <-[cla3:ATTACK_CLAIM {date: timestamp(), state: 'validated', reward: 0, rewarded: false} ]
         -(s2)
RETURN s2, att3, m1, cla3;

MATCH (s2:Spaceship {address: 'address21'})
MATCH (m1:Spaceship {address: 'address1'})
CREATE (m1)
         -[att4:ATTACK {result:   false, malicious: 1000, date: timestamp(), state: 'validated', reward: 0,
                        rewarded: false} ]->
       (s2)
         <-[cla4:ATTACK_CLAIM {date: timestamp(), state: 'validated', reward: 0, rewarded: false} ]
         -(m1)
RETURN m1, s2, att4, cla4;

MATCH (a2:Account {address: 'address23'})
MATCH (s2:Spaceship {address: 'address21'})
CREATE (a3)
         -[reg2:REGISTER {date: timestamp(), state: 'validated', reward: 0, rewarded: false} ]
         ->(s2)
RETURN a2, reg2, s2;

MATCH (n2:Node {address: 'address22'})
MATCH (a3:Account {address: 'address45'})
MATCH (pr1:Productor {label: 'Product Man', address: 'address60'})
CREATE (a2)
         -[reg2:REGISTER {date: timestamp(), state: 'validated', reward: 0, rewarded: false} ]
         ->(pr1)
         -[run1:RUN {date: timestamp(), state: 'validated', reward: 0, rewarded: false}]
         ->(n2)
RETURN a2, reg2, pr1, run2, n2;

MATCH (:Spaceship)-[r5:CONQUIERED {rewarded: false}]->(:Planet)
SET r5.reward = 1, r5.rewarded = true;

MATCH (:Account)-[s0:SELECTED {rewarded: false}]->(:BlockGenenator)-[g0:GENERATE {rewarded: false}]->(:Epoc)
SET g0.reward = 10, g0.rewarded = true, s0.reward = 70, s0.rewarded = true
RETURN g0, s0;

MATCH (:Account)-[r0:REGISTER {rewarded: false}]->(:Spaceship)-[u0:RUN {rewarded: false}]->(:Node)
SET r0.reward = 10, r0.rewarded = true, u0.reward = 1, u0.rewarded = true
RETURN r0, u0;

MATCH (:Account)-[d1:DELEGATE {rewarded: false}]->(:Account)-[e1:DEPOSIT {rewarded: false}]->(:Deposit)
SET d1.reward = 10, d1.rewarded = true, e1.reward = 1, e1.rewarded = true
RETURN d1, e1;

MATCH (n)
OPTIONAL MATCH (n)-[r]-()
RETURN n, r;
