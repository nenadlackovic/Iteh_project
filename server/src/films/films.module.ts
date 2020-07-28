import { Module } from '@nestjs/common';
import {TypeOrmModule} from "@nestjs/typeorm";
import { FilmsController } from './films.controller';
import { FilmsService } from './films.service';
import {Film} from "../entity/Film.entity";

@Module({
    imports: [TypeOrmModule.forFeature([Film])],
    controllers: [FilmsController],
    providers: [ FilmsService],
    exports: [FilmsService]
})
export class FilmsModule {}