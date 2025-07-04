# SonarQube

## SonarQube คืออะไร?

SonarQube เป็นแพลตฟอร์มโอเพนซอร์สสำหรับการตรวจสอบคุณภาพโค้ดแบบต่อเนื่อง ทำการวิเคราะห์โค้ดแบบ **static analysis** เพื่อตรวจหา **bugs**, **code smells**, ช่องโหว่ด้านความปลอดภัย และให้ข้อมูลเชิงตัวเลขเกี่ยวกับ **code coverage**, **complexity** และความสามารถในการบำรุงรักษา

## ทำไมต้องใช้ SonarQube?

- รับประกันคุณภาพโค้ด: ตรวจหา bugs ช่องโหว่ และปัญหาโค้ดก่อนที่จะไป production
- ความปลอดภัย: ตรวจจับจุดเสี่ยงและช่องโหว่ด้านความปลอดภัยในโค้ด
- ความสามารถในการบำรุงรักษา: ช่วยรักษาโค้ดให้สะอาด อ่านง่าย โดยการตรวจจับมาตรฐานการเขียนโค้ด
- การจัดการ Technical Debt: วัดค่า technical debt และช่วยจัดลำดับความสำคัญในการปรับปรุงโค้ด
- การรวมระบบแบบต่อเนื่อง: ผูกเข้ากับ CI/CD pipeline ได้อย่างเรียบร้อย
- รองรับหลายภาษา: รองรับภาษาโปรแกรมมิ่งกว่า 25 ภาษา
- เมตริกส์และรายงาน: ให้รายงานละเอียดและแดชบอร์ดสำหรับผู้บริหาร

## คุณสมบัติหลัก:

- การวิเคราะห์โค้ดแบบ static
- การติดตาม code coverage
- การตรวจจับโค้ดที่ซ้ำกัน
- การสแกนหาช่องโหว่ด้านความปลอดภัย
- Quality gates เพื่อป้องกันไม่ให้โค้ดคุณภาพต่ำถูก deploy
- การผูกเข้ากับ IDE และเครื่องมือ CI/CD ยอดนิยม

## The seven axes of quality

1. Potential bugs

   As with bugs, potential bugs represent actual problems in the code. Often, though, they’re conditional problems, ones that will only happen some of the time—which is probably how they get past the programmers’ own testing.

   The potential bugs category includes things like these:

   - Potential null pointer exceptions, which happen only under certain conditions
   - Null checks that dereference the items they’re checking
   - Math operations that use the wrong precision or lose precision

2. Coding rules(ch 13)

   It’s clear that some issues are worse than others. That’s why SonarQube ranks them at different severities: Blocker, Critical, Major, Minor, and Info. The rules-compliance percentage you see at lower left in the issues widget gives perspective. It’s based on the number and severity of issues versus the lines of code in the project. Whereas the issues counts are golf-style metrics, the rules-compliance index is like bowling: higher is better.

3. Tests

   unit-test coverage, which is a bit like double-entry bookkeeping, in that each unit of work in your program should ideally be balanced by a test verifying that it works correctly.

4. Duplications

   code duplications may not seem like a big deal. And at first, they might not be.

   The problem is that although copy-paste, the source of duplications, is often expedient, it’s not efficient in the long term. Somewhere in the same book that Murphy’s Law came from is the truism that the more places a chunk of logic has been duplicated into, the more likely it is that it will need to be changed, probably with a high level of urgency or criticality.

5. Comments

   There are two main types of code comments: the ones inline in any method (public or private) that are intended to notate some detail of the code logic, and the ones outside a public method that are intended to communicate how and why to use it (the API comments). The first kind is often referred to as a code smell. Like house guests and leftovers, this kind of comment tends to get stale. The logic changes, but the comments don’t; or the comments get separated from what they refer to. The second kind of comment (the API documentation) is what’s measured by SonarQube.

6. Architecture and design

   One side of the architecture and design axis is the tidiness of a program’s architecture. Not the way it was originally charted out: undoubtedly, the original plan had a Zenlike elegance and simplicity. What SonarQube measures is how it was implemented—how clean it is today. Do classes in package A include classes in package B, and vice versa? If so, either they should have been one package to start with, or you’ve got a big mess to sort out. Either way, you’ve got some cleaning up to do.

7. Complexity

   the explanation of the complexity axis is fairly simple. It’s a little more complicated than this, but essentially, these metrics are about how many pairs of curly braces (real or implied) your method has. The premise of this leading indicator is that the more pairs of curly braces there are, the more complex the logic is. And the more complex the logic, the harder it is to understand and maintain.
